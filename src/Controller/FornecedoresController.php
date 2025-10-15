<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fornecedores Controller
 *
 * @property \App\Model\Table\FornecedoresTable $Fornecedores
 */
class FornecedoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Fornecedores->find();
        $fornecedores = $this->paginate($query);

        $this->set(compact('fornecedores'));
    }

    /**
     * View method
     *
     * @param string|null $id Fornecedore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fornecedore = $this->Fornecedores->get($id, contain: []);
        $this->set(compact('fornecedore'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    // Força resposta JSON para debug
    $this->viewBuilder()->setClassName('Json');
    
    $fornecedore = $this->Fornecedores->newEmptyEntity();
    if ($this->request->is('post')) {
        $fornecedore = $this->Fornecedores->patchEntity($fornecedore, $this->request->getData());
        
        if ($this->Fornecedores->save($fornecedore)) {
            $this->set([
                'success' => true,
                'message' => 'Fornecedor cadastrado com sucesso!',
                'data' => $fornecedore
            ]);
            $this->viewBuilder()->setOption('serialize', ['success', 'message', 'data']);
            return;
        }
        
        // Erro ao salvar
        $this->response = $this->response->withStatus(400);
        $this->set([
            'success' => false,
            'message' => 'Erro ao salvar fornecedor',
            'errors' => $fornecedore->getErrors()
        ]);
        $this->viewBuilder()->setOption('serialize', ['success', 'message', 'errors']);
        return;
    }
}

    /**
     * Edit method
     *
     * @param string|null $id Fornecedore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fornecedore = $this->Fornecedores->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fornecedore = $this->Fornecedores->patchEntity($fornecedore, $this->request->getData());
            if ($this->Fornecedores->save($fornecedore)) {
                $this->Flash->success(__('The fornecedore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fornecedore could not be saved. Please, try again.'));
        }
        $this->set(compact('fornecedore'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fornecedore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fornecedore = $this->Fornecedores->get($id);
        if ($this->Fornecedores->delete($fornecedore)) {
            $this->Flash->success(__('The fornecedore has been deleted.'));
        } else {
            $this->Flash->error(__('The fornecedore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
    public function consultaCnpj($cnpj = null)
    {
        $this->request->allowMethod(['get', 'ajax']);

        if (!$cnpj) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode(['error' => 'CNPJ não informado']));
        }

        $http = new \Cake\Http\Client();
        $cnpj = preg_replace('/\D/', '', $cnpj); // limpa pontos/traços

        $response = $http->get("https://brasilapi.com.br/api/cnpj/v1/{$cnpj}");

        if ($response->isOk()) {
            $dados = $response->getJson();
            return $this->response->withType('application/json')
                ->withStringBody(json_encode($dados));
        } else {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode(['error' => 'Erro ao consultar API']));
        }
    }
}
