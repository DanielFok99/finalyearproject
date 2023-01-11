<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\PurchaseOrder
 *
 * @property int $id
 * @property string $doc_number
 * @property int $warehouse_id
 * @property int $supplier_id
 * @property string $total_tax
 * @property string $due_amount
 * @property string $sub_total
 * @property string $total_amount
 * @property string $profit
 * @property string $status
 * @property string $total_discount
 * @property string $purchase_note
 * @property string $prefer_ship_time
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Staff|null $createdBy
 * @property-read Supplier|null $supplier
 * @property-read Warehouse|null $warehouse
 * @method static Builder|PurchaseOrder newModelQuery()
 * @method static Builder|PurchaseOrder newQuery()
 * @method static Builder|PurchaseOrder query()
 * @method static Builder|PurchaseOrder whereCreatedAt($value)
 * @method static Builder|PurchaseOrder whereCreatedBy($value)
 * @method static Builder|PurchaseOrder whereDocNumber($value)
 * @method static Builder|PurchaseOrder whereDueAmount($value)
 * @method static Builder|PurchaseOrder whereId($value)
 * @method static Builder|PurchaseOrder wherePreferShipTime($value)
 * @method static Builder|PurchaseOrder whereProfit($value)
 * @method static Builder|PurchaseOrder wherePurchaseNote($value)
 * @method static Builder|PurchaseOrder whereStatus($value)
 * @method static Builder|PurchaseOrder whereSubTotal($value)
 * @method static Builder|PurchaseOrder whereSupplierId($value)
 * @method static Builder|PurchaseOrder whereTotalAmount($value)
 * @method static Builder|PurchaseOrder whereTotalDiscount($value)
 * @method static Builder|PurchaseOrder whereTotalTax($value)
 * @method static Builder|PurchaseOrder whereUpdatedAt($value)
 * @method static Builder|PurchaseOrder whereWarehouseId($value)
 * @mixin Eloquent
 */
class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_number', 'warehouse_id', 'supplier_id', 'total_tax',
        'due_amount', 'sub_total', 'total_amount', 'profit',
        'status', 'total_discount', 'purchase_note', 'prefer_ship_time',
        'created_by',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(Staff::class);
    }
}
