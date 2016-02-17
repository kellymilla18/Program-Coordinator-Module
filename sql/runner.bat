@echo off
echo Executing queries.sql...
mysql -u root -proot -DprogramCoordinatorModule < sql/runner.sql
echo DONE
pause