<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailingListSubscriberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailing_list_subscriber', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mailing_list_id')->index();
            $table->unsignedInteger('subscriber_id')->index();

            $table->foreign('mailing_list_id')->references('id')->on('mailing_lists')->onDelete('cascade');
            $table->foreign('subscriber_id')->references('id')->on('subscribers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailing_list_subscriber');
    }
}
