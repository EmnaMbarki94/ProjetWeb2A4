#include "transaction.h"

transaction::transaction()
{
    num="";
    date="";
    typeP="";
    typeT="";
    montant="";
}
bool transaction::createconnect()
{bool test=false;
QSqlDatabase db = QSqlDatabase::addDatabase("QODBC");
db.setDatabaseName("projet_insurance_company");
db.setUserName("system");//inserer nom de l'utilisateur
db.setPassword("232003");//inserer mot de passe de cet utilisateur
if (db.open())
test=true;

    return  test;
}
void transaction::setnum(QString n){num=n;}
void transaction::setdate(QString n){date=n;}
void transaction::settypeP(QString n){typeP=n;}
void transaction::settypeT(QString n){typeT=n;}
void transaction::setmontant(QString n){montant=n;}


QString transaction::get_num(){return num;}
QString transaction::get_date(){return date;}
QString transaction::get_typeP(){return typeP;}
QString transaction::get_typeT(){return typeT;}
QString transaction::get_montant(){return montant;}
