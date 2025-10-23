<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relasi ke tabel users
            $table->string('nama');
            $table->string('no_hp', 20);
            $table->string('jasa');
            $table->date('tgl_pemesanan');
            $table->date('tgl_kedatangan');
            $table->text('catatan')->nullable();
            $table->enum('status', ['pending','validated','completed','cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
