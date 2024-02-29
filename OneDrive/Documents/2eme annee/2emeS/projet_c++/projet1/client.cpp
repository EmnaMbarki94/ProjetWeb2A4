#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "client.h"
#include "connection.h"
#include <QTableWidget>
#include <QTableWidgetItem>
#include<QDebug>
Client::Client()
{
    cin=0;
    nom="";
    prenom="";
    mail="";
    numtel=0;

}
Client::Client(int cin,QString nom,QString prenom,QString mail,int numtel)
{
 this->cin=cin;
 this->nom=nom;
 this->prenom=prenom;
 this->mail=mail;
 this->numtel=numtel;

}

void Client ::setcin(int n){cin=n;}
void Client ::setprenom(QString n){prenom=n;}
void Client ::setnom(QString n){nom=n;}
void Client ::setemail(QString n){mail=n;}
void Client ::setnumtel(int n){numtel=n;}

int Client::get_cin(){return cin;}
QString Client::get_prenom(){return prenom;}
QString Client::get_nom(){return nom;}
QString Client::get_email(){return mail;}
int Client::get_numtel(){return numtel;}

bool Client::ajouter()
{
   cn.createconnect();
    QSqlQuery query;
   QString res =QString::number(cin);
    query.prepare("insert into client(cin,nom,prenom,mail,numtel)""values (:cin,:nom,:prenom,:mail,:numtel)");
    query.bindValue(":cin",res);
    query.bindValue(":nom",nom);
    query.bindValue(":prenom",prenom);
    query.bindValue(":mail",mail);
    query.bindValue(":numtel",numtel);

    return query.exec();
     //db.close();
}
void Client::afficher(QTableWidget *tableWidget)
{
    cn.createconnect();
    QSqlQuery query;
    query.prepare("SELECT * FROM client");

    if (query.exec()) {
        tableWidget->clearContents();
        tableWidget->setRowCount(0); // Clear existing rows

        QStringList labels;
        labels << "CIN" << "Nom" << "Prenom" << "Email" << "Numéro de téléphone";
        tableWidget->setColumnCount(labels.size());
        tableWidget->setHorizontalHeaderLabels(labels);

        int row = 0;
        while (query.next()) {
            tableWidget->insertRow(row);

            QTableWidgetItem *cin = new QTableWidgetItem(query.value(0).toString());
            QTableWidgetItem *nom = new QTableWidgetItem(query.value(1).toString());
            QTableWidgetItem *prenom = new QTableWidgetItem(query.value(2).toString());
            QTableWidgetItem *email = new QTableWidgetItem(query.value(3).toString());
            QTableWidgetItem *numtel = new QTableWidgetItem(query.value(4).toString());

            tableWidget->setItem(row, 0, cin);
            tableWidget->setItem(row, 1, nom);
            tableWidget->setItem(row, 2, prenom);
            tableWidget->setItem(row, 3, email);
            tableWidget->setItem(row, 4, numtel);

            row++;
        }
    }

}

void Client::supprimer(int row, int column, QTableWidget *tableWidget)
{
   cn.createconnect();
    if (column == 0 && tableWidget) {  // Colonne du CIN
        QString cinToSupprimer = tableWidget->item(row, column)->text();

        QSqlQuery query;
        query.prepare("DELETE FROM client WHERE cin = :CIN");
        query.bindValue(":CIN", cinToSupprimer);

        if (query.exec()) {
            qDebug() << "Client supprimé avec succès.";
            tableWidget->removeRow(row);
        } else {
            qDebug() << "Erreur lors de la suppression du client : " << query.lastError().text();
        }
    }

}
bool Client::modifier()
{
    cn.createconnect();


    QSqlQuery query;
    QString cin_string = QString::number(cin);
    QString numtel_string = QString::number(numtel);

    query.prepare("UPDATE client SET nom=:NOM, prenom=:PRENOM,  mail=:MAIL,numtel=:NUMTEL WHERE cin=:CIN");
    query.bindValue(":CIN", cin_string);
    query.bindValue(":NOM", nom);
    query.bindValue(":PRENOM", prenom);
    query.bindValue(":MAIL", mail);
     query.bindValue(":NUMTEL", numtel_string);
    bool success = query.exec();

    // Fermez la connexion à la base de données


    return success;
}
void Client::rechercher(const QString& cin, QTableWidget* tableWidget)
{
    QSqlDatabase db;
     cn.createconnect();
    QSqlQuery query(db);
    query.prepare("SELECT * FROM client WHERE cin = :cin");
    query.bindValue(":cin", cin);

    if (query.exec()) {
        int row = 0;

        while (query.next()) {
            QTableWidgetItem* item1 = new QTableWidgetItem(query.value(0).toString());
            QTableWidgetItem* item2 = new QTableWidgetItem(query.value(1).toString());
            QTableWidgetItem* item3 = new QTableWidgetItem(query.value(2).toString());
            QTableWidgetItem* item4 = new QTableWidgetItem(query.value(3).toString());
            QTableWidgetItem* item5 = new QTableWidgetItem(query.value(3).toString());
            // Ajoutez plus d'éléments selon le nombre de colonnes dans votre table

            tableWidget->insertRow(row);
            tableWidget->setItem(row, 0, item1);
            tableWidget->setItem(row, 1, item2);
            tableWidget->setItem(row, 2, item3);
            tableWidget->setItem(row, 3, item4);
            tableWidget->setItem(row, 4, item5);

            // Associez les items aux colonnes supplémentaires de la table

            row++;
        }

        qDebug() << "Recherche du client réussie. Nombre de lignes : " << row;
    } else {
        qDebug() << "Erreur lors de la recherche du client : " << query.lastError().text();
    }

    db.close();
}


