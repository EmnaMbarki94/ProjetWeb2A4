#include "reclamation.h"

Reclamation::Reclamation()
{
    id="";
    type="";
    texte="";
}

bool Reclamation::createconnect()
{bool test=false;
QSqlDatabase db = QSqlDatabase::addDatabase("QODBC");
db.setDatabaseName("projet_insurance_company");
db.setUserName("system");//inserer nom de l'utilisateur
db.setPassword("esprit");//inserer mot de passe de cet utilisateur
if (db.open())
test=true;

    return  test;
}

void Reclamation::setid(QString n)
{
    id=n;
}
void Reclamation::settype(QString n)
{
    type=n;
}
void Reclamation::settexte(QString n)
{
    texte=n;
}
QString Reclamation::get_id()
{
    return id;
}
QString Reclamation::get_type()
{
    return type;
}
QString Reclamation::get_texte()
{
    return texte;
}

