<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeTransactionStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            DB::statement("ALTER TABLE transactions CHANGE COLUMN mode mode ENUM('1', '2', '3') DEFAULT '1'");
            DB::statement("ALTER TABLE transactions CHANGE COLUMN status status ENUM('1', '2', '3', '4') DEFAULT '1'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            DB::statement("ALTER TABLE transactions CHANGE COLUMN mode mode ENUM('cod', 'card', 'paypal') DEFAULT 'cod'");
            DB::statement("ALTER TABLE transactions CHANGE COLUMN status status ENUM('pending', 'approved', 'declined', 'refunded') DEFAULT 'pending'");
        });
    }
}
