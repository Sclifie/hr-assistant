Простая система для помощи hr_у
Предусматривает создание интервью [v]
Сущность interview - интервью с тремя статусами в статусе rejected 
    interview_passed - пройдено идём по флоу на создание employee + order?->contract
    interview_rejected - должно отправляться письмо на e-mail к собеседуемому с msg.
    interview_open - просто создание.
Сущность position - создание позиции в компании сущность без которой не создаётся interview.
Сущность employee - создание работника
    по умолчанию 'not active', будет создана вместе с interview
Сущность order - приказ
    Сущность vacation - это подгруппа приказов на отпуск
    Сущность dismissal - это подгруппа приказов на увольнение

Сущность contract - это ??подгруппа приказов?? на принятие на работу