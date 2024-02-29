#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "client.h"
#include<QMessageBox>
#include "connection.h"

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{

    ui->setupUi(this);
    ui->cin->setValidator(new QIntValidator(0,99999999,this));
     cl.afficher(ui->tableWidget);


    /*QObject::connect(ui->pushButton_5,SIGNAL(clicked()),this,SLOT(pagetwidget()));
     QObject::connect(ui->pushButton_4,SIGNAL(clicked()),this,SLOT(pagecwidget()));*/
}
MainWindow::~MainWindow()
{
    delete ui;
}


void MainWindow::on_pushButton_clicked()
{
    int cin = ui->cin->text().toInt();
    QString nom = ui->nom->text();
    QString prenom = ui->prenom->text();
    QString mail = ui->mail->text();
    int numtel = ui->numtel->text().toInt();

    Client c(cin, nom, prenom, mail, numtel);

    bool test = c.ajouter();

    if (test)
    {
        cl.afficher(ui->tableWidget);

        QMessageBox::information(nullptr, QObject::tr("ok"), QObject::tr("Client ajouté avec succès.\nCliquez sur Annuler pour quitter."), QMessageBox::Cancel);
    }
    else
    {
        QMessageBox::critical(nullptr, QObject::tr("Error"), QObject::tr("Erreur lors de l'ajout du client."), QMessageBox::Cancel);
    }
}

/*void MainWindow::pagecwidget()
{
    QObject::connect(ui->pushButton_5,SIGNAL(clicked()),this,SLOT(pagetwidget()));
    ui->stackedWidget->setCurrentWidget(ui->page);
}
void MainWindow::pagetwidget()
{
    QObject::connect(ui->pushButton_90,SIGNAL(clicked()),this,SLOT(pagecwidget()));
    ui->stackedWidget->setCurrentWidget(ui->page_12);
}*/

void MainWindow::on_pushButton_35_clicked()
{
    ui->stackedWidget->setCurrentIndex(0);
}
void MainWindow::on_pushButton_90_clicked()
{

     ui->stackedWidget->setCurrentIndex(0);

}
void MainWindow::on_pushButton_46_clicked()
{
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_14_clicked()
{
    ui->stackedWidget->setCurrentIndex(0);
}
void MainWindow::on_pushButton_27_clicked()
{
    ui->stackedWidget->setCurrentIndex(0);
}

void MainWindow::on_pushButton_36_clicked()
{
    ui->stackedWidget->setCurrentIndex(1);
}

void MainWindow::on_pushButton_91_clicked()
{
     ui->stackedWidget->setCurrentIndex(1);
}
void MainWindow::on_pushButton_5_clicked()
{

    ui->stackedWidget->setCurrentIndex(1);

}
void MainWindow::on_pushButton_47_clicked()
{
     ui->stackedWidget->setCurrentIndex(1);
}

void MainWindow::on_pushButton_15_clicked()
{
    ui->stackedWidget->setCurrentIndex(1);
}
void MainWindow::on_pushButton_28_clicked()
{
     ui->stackedWidget->setCurrentIndex(1);
}
void MainWindow::on_pushButton_3_clicked()
{
    ui->stackedWidget->setCurrentIndex(2);

}
void MainWindow::on_pushButton_89_clicked()
{
      ui->stackedWidget->setCurrentIndex(2);
}


void MainWindow::on_pushButton_34_clicked()
{
    ui->stackedWidget->setCurrentIndex(2);
}
void MainWindow::on_pushButton_45_clicked()
{
    ui->stackedWidget->setCurrentIndex(2);
}

void MainWindow::on_pushButton_13_clicked()
{
    ui->stackedWidget->setCurrentIndex(2);
}

void MainWindow::on_pushButton_26_clicked()
{
    ui->stackedWidget->setCurrentIndex(2);
}


void MainWindow::on_pushButton_39_clicked()
{
     ui->stackedWidget->setCurrentIndex(3);
}

void MainWindow::on_pushButton_94_clicked()
{
     ui->stackedWidget->setCurrentIndex(3);
}

void MainWindow::on_pushButton_10_clicked()
{
    ui->stackedWidget->setCurrentIndex(3);
}

void MainWindow::on_pushButton_99_clicked()
{
     ui->stackedWidget->setCurrentIndex(3);
}
void MainWindow::on_pushButton_18_clicked()
{
    ui->stackedWidget->setCurrentIndex(3);
}

void MainWindow::on_pushButton_31_clicked()
{
     ui->stackedWidget->setCurrentIndex(3);
}

void MainWindow::on_pushButton_6_clicked()
{
    ui->stackedWidget->setCurrentIndex(4);
}

void MainWindow::on_pushButton_92_clicked()
{
     ui->stackedWidget->setCurrentIndex(4);
}

void MainWindow::on_pushButton_37_clicked()
{
     ui->stackedWidget->setCurrentIndex(4);
}

void MainWindow::on_pushButton_48_clicked()
{
     ui->stackedWidget->setCurrentIndex(4);
}

void MainWindow::on_pushButton_16_clicked()
{
     ui->stackedWidget->setCurrentIndex(4);
}


void MainWindow::on_pushButton_29_clicked()
{
    ui->stackedWidget->setCurrentIndex(4);
}

void MainWindow::on_pushButton_30_clicked()
{
    ui->stackedWidget->setCurrentIndex(5);
}

void MainWindow::on_pushButton_9_clicked()
{
    ui->stackedWidget->setCurrentIndex(5);
}

void MainWindow::on_pushButton_93_clicked()
{
     ui->stackedWidget->setCurrentIndex(5);
}

void MainWindow::on_pushButton_38_clicked()
{
     ui->stackedWidget->setCurrentIndex(5);
}

void MainWindow::on_pushButton_98_clicked()
{
    ui->stackedWidget->setCurrentIndex(5);
}

void MainWindow::on_pushButton_17_clicked()
{
    ui->stackedWidget->setCurrentIndex(5);
}

void MainWindow::on_pushButton_49_clicked()
{
    ui->stackedWidget->setCurrentIndex(2);
}




void MainWindow::on_pushButton_8_clicked()
{
    // Obtenez la ligne actuellement sélectionnée
    int selectedRow = ui->tableWidget->currentRow();

    if (selectedRow >= 0) {
        // Obtenez le CIN de la colonne 0 (suppose que le CIN est dans la première colonne)
        QString cinToSupprimer = ui->tableWidget->item(selectedRow, 0)->text();

        // Créez une instance de la classe Client et appelez la fonction supprimer
        Client client;
        client.supprimer(selectedRow, 0, ui->tableWidget);
         cl.afficher(ui->tableWidget);
    } else {
        qDebug() << "Aucune ligne sélectionnée.";
    }

}
void MainWindow::on_pushButton_11_clicked()
{
    int selectedRow = ui->tableWidget->currentRow();

       if (selectedRow >= 0) {
           // Obtenez le CIN de la colonne 0 (suppose que le CIN est dans la première colonne)
           QString cinToUpdate = ui->tableWidget->item(selectedRow, 0)->text();

           // Mettez à jour le client en appelant la fonction modifier de la classe Client

           cl.setcin(cinToUpdate.toInt()); // Assurez-vous que setCin est défini dans votre classe Client
           cl.setnom(ui->tableWidget->item(selectedRow, 1)->text()); // Assurez-vous d'ajuster les indices de colonne
           cl.setprenom(ui->tableWidget->item(selectedRow, 2)->text());
           cl.setemail(ui->tableWidget->item(selectedRow, 3)->text());
            cl.setnumtel(ui->tableWidget->item(selectedRow, 4)->text().toInt());
           if (cl.modifier()) {
               qDebug() << "Client modifié avec succès.";

               // Mettez à jour la ligne correspondante dans le QTableWidget
               ui->tableWidget->setItem(selectedRow, 1, new QTableWidgetItem(cl.get_nom()));
               ui->tableWidget->setItem(selectedRow, 2, new QTableWidgetItem(cl.get_prenom()));
               ui->tableWidget->setItem(selectedRow, 3, new QTableWidgetItem(cl.get_email()));
               ui->tableWidget->setItem(selectedRow, 4, new QTableWidgetItem(QString::number(cl.get_numtel())));
                cl.afficher(ui->tableWidget);
           } else {
               qDebug() << "Erreur lors de la modification du client.";
           }
       } else {
           qDebug() << "Aucune ligne sélectionnée.";
       }
        cl.afficher(ui->tableWidget);
}



void MainWindow::on_pushButton_2_clicked()
{
    // Obtenez le texte actuel dans le QLineEdit de recherche par CIN
    QString cinARechercher = ui->lineEdit->text().trimmed();

    // Effacez le contenu actuel du QTableWidget
    ui->tableWidget->setRowCount(0);


    // Appelez la fonction de recherche dans la classe Client
    cl.rechercher(cinARechercher, ui->tableWidget);
     cl.afficher(ui->tableWidget);
}

void MainWindow::on_lineEdit_editingFinished()
{
    QString cinARechercher = ui->lineEdit->text().trimmed();

    // Effacez le contenu actuel du QTableWidget
    ui->tableWidget->setRowCount(0);


    // Appelez la fonction de recherche dans la classe Client
    cl.rechercher(cinARechercher, ui->tableWidget);
}



