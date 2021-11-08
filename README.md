#ЗАДАНИЕ

Разработать web приложение доставки питания по подписке. В приложении можно создавать заказы и просматривать созданные заказы 
Поля заказа: 
1. ФИО клиента
2. телефон клиента
3. дата создания заказа
4. название рациона питания
5. период доставки (с даты по дату)
6. расписание доставки (варианты: ежедневная, доставка через день на один день питания, доставка через день на 2 дня питания)
7. дни недели питания (с пн по вскр, можно выбрать любое сочетание дней)
8. комментарий

При создании заказа должно формироваться расписание доставки с учетом условий 5, 6 и 7 и отображаться при просмотре заказа (в виде списка дней с количеством рационов питания, которые нужно доставить в этот день, или календаря).
Пример1: период 07.10.2021-14.10.2021, ежедневная доставка, дни питания понедельник-пятница. Подписка должна получиться: 7.10.2021, 8.10.2021, 11.10.2021-14.10.2021. Всего будет доставлено 6 порций.
Пример2: период 08.10.2021-17.10.2021, доставка через день на 2 дня питания, дни питания понедельник-пятница. Подписка должна получиться: 08.10.2021 - 1 порция, 12.10.2021 - 2 порции, 14.10.2021 - 2 порции. Всего будет доставлено 5 порций.

Приложение реализовать на PHP и JavaScript, можно использовать любые библиотеки и фреймворки.
Необходимо приложить инструкцию как запустить приложение, включая предварительную настройку окружения.

##Страница со списком заказов

![Список заказов](1.png)

##Страница нового заказа

![Новый заказ](2.png)