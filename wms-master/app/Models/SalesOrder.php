<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\SalesOrder
 *
 * @property int $id
 * @property string $doc_number
 * @property int $warehouse_id
 * @property int $customer_id
 * @property int $customer_address_id
 * @property string $total_tax
 * @property string $due_amount
 * @property string $sub_total
 * @property string $total_amount
 * @property string $profit
 * @property string $status
 * @property string $total_discount
 * @property string $sales_note
 * @property string $prefer_ship_time
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Staff|null $createdBy
 * @property-read CustomerAddress|null $customerAddress
 * @property-read Customer|null $custormer
 * @property-read Warehouse|null $warehouse
 * @method static Builder|SalesOrder newModelQuery()
 * @method static Builder|SalesOrder newQuery()
 * @method static Builder|SalesOrder query()
 * @method static Builder|SalesOrder whereCreatedAt($value)
 * @method static Builder|SalesOrder whereCreatedBy($value)
 * @method static Builder|SalesOrder whereCustomerAddressId($value)
 * @method static Builder|SalesOrder whereCustomerId($value)
 * @method static Builder|SalesOrder whereDocNumber($value)
 * @method static Builder|SalesOrder whereDueAmount($value)
 * @method static Builder|SalesOrder whereId($value)
 * @method static Builder|SalesOrder wherePreferShipTime($value)
 * @method static Builder|SalesOrder whereProfit($value)
 * @method static Builder|SalesOrder whereSalesNote($value)
 * @method static Builder|SalesOrder whereStatus($value)
 * @method static Builder|SalesOrder whereSubTotal($value)
 * @method static Builder|SalesOrder whereTotalAmount($value)
 * @method static Builder|SalesOrder whereTotalDiscount($value)
 * @method static Builder|SalesOrder whereTotalTax($value)
 * @method static Builder|SalesOrder whereUpdatedAt($value)
 * @method static Builder|SalesOrder whereWarehouseId($value)
 * @mixin Eloquent
 */
class SalesOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_number', 'warehouse_id', 'customer_id', 'customer_address_id', 'total_tax',
        'due_amount', 'sub_total', 'total_amount', 'profit',
        'status', 'total_discount', 'purchase_note', 'prefer_ship_time',
        'created_by',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function custormer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function customerAddress()
    {
        return $this->belongsTo(CustomerAddress::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(Staff::class);
    }
}
