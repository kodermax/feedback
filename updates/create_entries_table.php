<?php namespace Kodermax\FeedBack\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateEntriesTable extends Migration
{

    public function up()
    {
        Schema::create('kodermax_feedback_entries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('author')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('body')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kodermax_feedback_entries');
    }

}
