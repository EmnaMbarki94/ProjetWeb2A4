#ifndef EMPLOYE_H
#define EMPLOYE_H
#include <QString>
#include <QSqlDatabase>
#include <QSqlError>
#include <QSqlQuery>

class Reclamation
{
public:
    void setid(QString n);
    void settype(QString n);
    void settexte(QString n);
    QString get_id();
    QString get_type();
    QString get_texte();
    Reclamation();
    bool createconnect();
private:
    QString id,type,texte;
};

#endif // EMPLOYE_H
