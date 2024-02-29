#ifndef EMPLOYE_H
#define EMPLOYE_H
#include <QString>
#include <QSqlDatabase>
#include <QSqlError>
#include <QSqlQuery>
#include <QDebug>

class Employe
{
public:
    void setnom(QString n);
    void setprenom(QString n);
    void setemail(QString n);
    void setnum(QString n);
    void setfct(QString n);
    QString get_nom();
    QString get_prenom();
    QString get_email();
    QString get_num();
    QString get_fct();
    Employe();
    bool createconnect();
private:
    QString nom,prenom,email,num,fct;
};

#endif // EMPLOYE_H
