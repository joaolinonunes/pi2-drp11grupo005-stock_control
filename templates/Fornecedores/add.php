<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Fornecedores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="fornecedores form content">
            <?= $this->Form->create($fornecedore) ?>
            <fieldset>
                <legend><?= __('Add Fornecedore') ?></legend>
                <?php
                    echo $this->Form->control('cnpj', [
                        'id' => 'cnpj',
                        'label' => 'CNPJ'
                    ]);
                    echo $this->Form->control('nome', ['id' => 'nome']);
                    echo $this->Form->control('contato', ['id' => 'contato']);
                    echo $this->Form->control('categoria', ['id' => 'categoria']);
                    echo $this->Form->control('data_cadastro', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
  