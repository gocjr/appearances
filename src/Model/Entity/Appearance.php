<?php
namespace Appearances\Model\Entity;

use Cake\ORM\Entity;

/**
 * Brand Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property int $brand_fipe_id
 *
 * @property \App\Model\Entity\Model[] $models
 */
class Appearance extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'slug' => true,
        'created' => true,
        'modified' => true,
    ];
}
