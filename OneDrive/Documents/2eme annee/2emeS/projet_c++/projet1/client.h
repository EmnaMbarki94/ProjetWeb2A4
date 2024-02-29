#ifndef CLIENT_H
#define CLIENT_H
#include <QString>
#include <QSqlDatabase>
#include <QSqlError>
#include <QSqlQuery>
#include <QSqlQueryModel>
#include <QTableWidget>
#include <QTableWidgetItem>
#include "connection.h"

class Client
{
public:

    void setcin(int n);
    void setprenom(QString n);
    void setnom(QString n);
    void setemail(QString n);
    void setnumtel(int n);
    int get_cin();
    QString get_prenom();
    QString get_nom();
    QString get_email();
    int get_numtel();
    Client();
    Client(int ,  QString ,  QString , QString , int );
    bool ajouter();
    void afficher(QTableWidget *tableWidget);
    bool modifier();
    void rechercher(const QString& cin, QTableWidget* tableWidget);
public slots:
    void supprimer(int row, int column, QTableWidget *tableWidget);
    //bool createconnect();
   private:
    QString prenom,nom,mail;
    int cin,numtel;
    Connection cn;
};

#endif // CLIENT_H
