<?php

declare(strict_types=1);

namespace Appearances\Controller\Admin;

class AppearancesController extends AppController
{

    public function install(): void
    {
        $this->disableAutoRender();

        $schema = new Cake\Database\Schema\TableSchema('appearances');
        $schema
            ->addColumn('id', [
                'type' => 'integer',
                'length' => 11,
                'null' => false,
                'default' => null,
            ])
            ->addColumn('title', [
                'type' => 'string',
                'length' => 120,
                'fixed' => true
            ])
            ->addColumn('slug', [
                'type' => 'string',
                'length' => 120,
                'fixed' => true
            ])
            ->addConstraint('primary', [
                'type' => 'primary',
                'columns' => ['id']
            ])
            ->options([
                'engine' => 'InnoDB',
                'collate' => 'utf8_unicode_ci',
            ]);
    }

    public function index()
    {
    }

    public function add()
    {
    }

    public function view($id = null)
    {
    }

    public function edit($id = null)
    {
    }

    public function delete($id = null)
    {
    }
}
