** English **

= Module description =
Products export module in a background - using cronjob.

Similar to standart magento module functionality, except:
- don`t craches on timeout, when there are many products to export
- don`t block admin panel, while working
- can download any previously generated export file, without generating it again
- uses cron and magento observer to execute

= How it works? =
1) In Magento admin panel on top menu open Export Products->View Export Queue
2) You will see queue table - it is a list of all export jobs, and their statuses
3) You can do several actions:
   - add new export task (runs every 5 minutes, if another one process isn`t running)
   - download export file, by clicking on finished export process
   - delete previously added export job (file will not be deleted)

** Russian **

= Описание модуля =
Модуль экспорта товаров в фоне - используя крон.

Работает как стандартный экспорт с несколькими отличиями:
- не вываливается по таймауту, как стандартный экспорт
- не блокирует работу админки, как стандартный экспорт
- можно скачать ранее сгенерированные файлы экспорта
- использует крон и magento observer для работы

Как работает?
1) В админ панели Magento нужно выбрать пункт верхнего меню Export Products->View Export Queue
2) Откроется таблица очереди экспорта - это список всех крон-задач с текущими статусами по созданию файла экспорта
3) Можно выполнить несколько действий:
   - добавить задачу экспорта (запускается каждые 5 минут по крону, если нет уже запущенного процесса экспорта)
   - скачать ранее сгенерированный файл экспорта, для этого нужно кликнуть по завершенному экспорту в таблице очереди
   - удалить из очереди ранее добавленные задачи экспорта (соответствующие файлы экспорта при этом удалены не будут)
