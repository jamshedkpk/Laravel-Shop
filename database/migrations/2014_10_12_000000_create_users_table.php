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
$table->string('password');
$table->foreignId('role_id')->default(2);
$table->foreignId('country_id')->nullable();
$table->foreignId('city_id')->nullable();
$table->foreignId('state_id')->nullable();
$table->string('address')->nullable();
$table->string('mobile')->nullable();
$table->text('photo')->nullable();
$table->string('status')->nullable();
$table->rememberToken();
$table->timestamps();
});
}
public function down()
{
Schema::dropIfExists('users');
}
};
