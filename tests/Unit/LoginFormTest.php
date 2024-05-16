<?php

describe('Http\Form\LoginForm', function () {
    describe('#validate', function () {
        beforeEach(function () {
            $this->loginForm = new Http\Form\LoginForm();
        });

        it('deve retornar false para email inválido', function () {
            expect($this->loginForm->validate('email', 'password'))->toBe(false);
        });

        it('deve retornar false para senha inválida', function () {
            expect($this->loginForm->validate('email@email.com', ''))->toBe(false);
        });

        it('deve retornar true para email e senha válidos', function () {
            expect($this->loginForm->validate('email@email.com', 'password'))->toBe(true);
        });
    });

    describe('#erros', function () {
        it('deve retornar os erros', function () {
            $loginForm = new Http\Form\LoginForm();
            $loginForm->erro('email', 'O formato do email é inválido');
            expect($loginForm->erros())->toBe(['email' => 'O formato do email é inválido']);
        });
    });
});