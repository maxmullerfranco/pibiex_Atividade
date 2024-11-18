<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
     * Executa as migrações.
     * Este método será chamado quando a migração for executada.
     * Ele cria a tabela 'users' com as colunas definidas.
     */
    public function up(): void
    {
        // Cria a tabela 'users' no banco de dados
        Schema::create('users', function (Blueprint $table) {
            // Coluna 'id' do tipo auto incremento, chave primária
            $table->id();
            // Coluna 'name' do tipo string para armazenar o nome do usuário
            $table->string('name');
            // Coluna 'email' do tipo string, que deve ser única (não pode haver e-mails duplicados)
            $table->string('email')->unique();
            // Coluna 'email_verified_at' do tipo timestamp, que pode ser nula, para registrar a verificação do e-mail
            $table->timestamp('email_verified_at')->nullable();
            // Coluna 'password' do tipo string para armazenar a senha do usuário
            $table->string('password');
            // Coluna 'rememberToken' para armazenar o token de "lembrar login" do usuário
            $table->rememberToken();
            // Cria automaticamente as colunas 'created_at' e 'updated_at' para registrar quando o registro foi criado e atualizado
            $table->timestamps();
        });
    }

    /**
     * Reverte as migrações.
     * Este método será chamado quando a migração for revertida.
     * Ele remove a tabela 'users' do banco de dados.
     */
    public function down(): void
    {
        // Remove a tabela 'users' do banco de dados, caso exista
        Schema::dropIfExists('users');
    }

};
