<?php

declare(strict_types=1);

namespace Appearances\Model\Table;

use App\Model\Table\AppTable;

class AppearancesTable extends AppTable
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('appearances');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

}
