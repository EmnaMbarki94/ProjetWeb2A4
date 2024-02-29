#include "employe.h"

Employe::Employe()
{
    nom="";
    prenom="";
    email="";
    num="";
    fct="";
}
bool Employe::createconnect()
{bool test=false;
QSqlDatabase db = QSqlDatabase::addDatabase("QODBC");
db.setDatabaseName("projet_insurance_company");
db.setUserName("system");//inserer nom de l'utilisateur
db.setPassword("0000");//inserer mot de passe de cet utilisateur

if (db.open())
test=true;

    return  test;
}
void Employe::setnom(QString n)
{
    nom=n;
}
void Employe::setprenom(QString n)
{
    prenom=n;
}
void Employe::setemail(QString n)
{
    email=n;
}
void Employe::setnum(QString n)
{
    num=n;
}
void Employe::setfct(QString n)
{
    fct=n;
}
QString Employe::get_nom()
{
    return nom;
}
QString Employe::get_prenom()
{
    return prenom;
}
QString Employe::get_email()
{
    return email;
}
QString Employe::get_num()
{
    return num;
}
QString Employe::get_fct()
{
    return fct;
}
