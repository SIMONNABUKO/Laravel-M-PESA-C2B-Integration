<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesaTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('TransactionType')->default('pay');
            $table->string('TransID')->default('pay');
            $table->string('TransTime')->default('pay');
            $table->decimal('TransAmount', 8,2)->default(200);;
            $table->string('BusinessShortCode')->default('pay');
            $table->string('BillRefNumber')->default('pay');
            $table->string('InvoiceNumber')->default('pay');
            $table->decimal('OrgAccountBalance',8,2)->default(200);
            $table->string('ThirdPartyTransID')->default('pay');
            $table->string('MSISDN')->default('pay');
            $table->string('FirstName')->default('Simon');
            $table->string('MiddleName')->default('Angatia');
            $table->string('LastName')->default('pay');
            $table->text('response')->default('response');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mpesa_transactions');
    }
}