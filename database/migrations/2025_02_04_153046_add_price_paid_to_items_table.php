<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPricePaidToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            // Add a new decimal column for the price we paid; allow it to be nullable if not always known
            $table->decimal('price_paid', 10, 2)->nullable()->after('price');
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('price_paid');
        });
    }
}
