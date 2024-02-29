#ifndef TRANSACTION_H
#define TRANSACTION_H
#include<QString>
#include <QSqlDatabase>
#include <QSqlError>
#include <QSqlQuery>
class transaction
{
public:
    void setnum(QString n);
    void setdate(QString n);
    void settypeP(QString n);
    void settypeT(QString n);
    void setmontant(QString n);

    QString get_num();
    QString get_date();
    QString get_typeP();
    QString get_typeT();
    QString get_montant();

    transaction();
    bool createconnect();

private:
    QString num,date,typeP,typeT,montant;

};

#endif // TRANSACTION_H
