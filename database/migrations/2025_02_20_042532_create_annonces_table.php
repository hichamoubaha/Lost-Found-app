<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Lié à l'utilisateur
            $table->string('titre');
            $table->text('description');
            $table->string('image')->nullable();
            $table->date('date_perdu_trouve');
            $table->string('lieu');
            $table->enum('statut', ['perdu', 'trouvé']);
            $table->string('categorie');
            $table->string('contact_email');
            $table->string('contact_telephone')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('annonces');
    }
};
