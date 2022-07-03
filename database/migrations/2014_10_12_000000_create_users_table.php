<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
Schema::create('users', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->string('email')->unique();
$table->timestamp('email_verified_at')->nullable();
$table->foreignId('role_id')->default(1);
$table->string('country')->nullable();
$table->string('city')->nullable();
$table->string('state')->nullable();
$table->string('address')->nullable();
$table->string('mobile')->nullable();
$table->string('password');
$table->rememberToken();
$table->timestamps();
});
}
public function down()
{
Schema::dropIfExists('users');
}
};
