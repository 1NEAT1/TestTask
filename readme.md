- Отправить данные через Input
1. Пользователь вводит произвольные данные.
2. Данные отправляются на сервер и проходят валидацию.
3. После прохождения валидации данные хешируются и записываются в таблицу (с пометкой type = 0, значит не почта).
4. Пользователю выдается ключ и ссылка для просмотра введенных данных.

- Отправить данные по Email
1. Пользователь вводит Email на который хочет получить ответ и данные.
2. Данные отправляются на сервер и проходят валидацию.
3. После прохождения валидации данные хешируются и записываются в таблицу (с пометкой type = 1, значит на почту).
3.1. По идеи можно и не получать письмо пользователя на почту, а только отправлять ему в ответ если была заполнена форма с Email.
4. Пользователю высылается на почту ключ и ссылка для просмотра введенных данных.