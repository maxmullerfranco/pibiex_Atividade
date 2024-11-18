<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     * Este método será chamado quando a migração for executada.
     * Ele cria a tabela 'password_reset_tokens' para armazenar tokens de redefinição de senha.
     */
    public function up(): void
    {
        // Cria a tabela 'password_reset_tokens'
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            // Coluna 'email' do tipo string que será a chave primária da tabela (cada e-mail pode ter apenas um token de redefinição)
            $table->string('email')->primary();
            // Coluna 'token' do tipo string para armazenar o token de redefinição de senha
            $table->string('token');
            // Coluna 'created_at' do tipo timestamp para armazenar a data e hora em que o token foi gerado (pode ser nula)
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverte as migrações.
     * Este método será chamado quando a migração for revertida.
     * Ele remove a tabela 'password_reset_tokens' do banco de dados.
     */
    public function down(): void
    {
        // Remove a tabela 'password_reset_tokens' do banco de dados, caso exista
        Schema::dropIfExists('password_reset_tokens');
    }

};
