<?php

/**
 * Класс для проверки авторизированного пользователя
 *
 * @author Озармехр
 */
class AdminBase {

    function __construct() {
        // Поллучаем id пользователя из сессии
        $id = User::checkLoggedUser();
        // Получаем данные о пользователье с помощью id
        $user = User::get_UserById($id);

        // Проверяем, является ли аользователя администратором
        if ($user['role'] == 'admin') {
            return TRUE;
        }
        die("Доступ запрещен");
    }

}
