<?php

declare(strict_types=1);

namespace Appearances\Controller\Admin;

use App\Controller\AppController as BaseAppController;
use Cake\Database\Schema\TableSchema;

class AppController extends BaseAppController
{
    public function install(): void
    {
        $this->disableAutoRender();
        $controller = strtolower($this->request->getParam('controller'));
        $schema = new TableSchema($controller);
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
}
