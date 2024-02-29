#ifndef MAINWINDOW_H
#define MAINWINDOW_H
#include "client.h"
#include "connection.h"
#include <QMainWindow>
#include<QtGui>
#include<QStackedWidget>
QT_BEGIN_NAMESPACE
namespace Ui { class MainWindow; }
QT_END_NAMESPACE

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    MainWindow(QWidget *parent = nullptr);
    ~MainWindow();

private slots:
    void on_pushButton_clicked();
    /*void pagecwidget();
    void pagetwidget();*/

    void on_pushButton_5_clicked();

    void on_pushButton_90_clicked();

    void on_pushButton_3_clicked();

    void on_pushButton_89_clicked();

    void on_pushButton_91_clicked();

    void on_pushButton_34_clicked();

    void on_pushButton_35_clicked();

    void on_pushButton_36_clicked();

    void on_pushButton_45_clicked();

    void on_pushButton_46_clicked();

    void on_pushButton_47_clicked();

    void on_pushButton_39_clicked();

    void on_pushButton_94_clicked();

    void on_pushButton_10_clicked();

    void on_pushButton_99_clicked();

    void on_pushButton_6_clicked();

    void on_pushButton_92_clicked();

    void on_pushButton_37_clicked();

    void on_pushButton_48_clicked();

    void on_pushButton_16_clicked();

    void on_pushButton_13_clicked();

    void on_pushButton_14_clicked();

    void on_pushButton_15_clicked();

    void on_pushButton_18_clicked();

    void on_pushButton_26_clicked();

    void on_pushButton_27_clicked();

    void on_pushButton_28_clicked();

    void on_pushButton_29_clicked();

    void on_pushButton_30_clicked();

    void on_pushButton_31_clicked();

    void on_pushButton_9_clicked();

    void on_pushButton_93_clicked();

    void on_pushButton_38_clicked();

    void on_pushButton_98_clicked();

    void on_pushButton_17_clicked();

    void on_pushButton_49_clicked();

    void on_pushButton_8_clicked();


    void on_pushButton_11_clicked();




    void on_pushButton_2_clicked();

    void on_lineEdit_editingFinished();

    //void on_lineEdit_textChanged(const QString &text);

private:
    Ui::MainWindow *ui;
    Client cl;
    Connection cn;

};
#endif // MAINWINDOW_H
