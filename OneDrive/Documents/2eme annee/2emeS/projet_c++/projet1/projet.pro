QT       += core gui sql

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

CONFIG += c++11 console

# The following define makes your compiler emit warnings if you use
# any Qt feature that has been marked deprecated (the exact warnings
# depend on your compiler). Please consult the documentation of the
# deprecated API in order to know how to port your code away from it.
DEFINES += QT_DEPRECATED_WARNINGS

# You can also make your code fail to compile if it uses deprecated APIs.
# In order to do so, uncomment the following line.
# You can also select to disable deprecated APIs only up to a certain version of Qt.
#DEFINES += QT_DISABLE_DEPRECATED_BEFORE=0x060000    # disables all the APIs deprecated before Qt 6.0.0

SOURCES += \
    client.cpp \
    connection.cpp \
    main.cpp \
    mainwindow.cpp \


HEADERS += \
    ../../../../Downloads/employe/projet - Copie/employe.h \
    client.h \
    connection.h \
    mainwindow.h \


FORMS += \
    mainwindow.ui

# Default rules for deployment.
qnx: target.path = /tmp/$${TARGET}/bin
else: unix:!android: target.path = /opt/$${TARGET}/bin
!isEmpty(target.path): INSTALLS += target


DISTFILES += \
    ressources/405020030_390110873610731_3857294868988413096_n.png \
    ressources/405104671_894605635545040_6599617230245675821_n.png \
    ressources/405125987_240725965673369_5384739589695128448_n.png \
    ressources/422670916_952311876457594_4377088818375921302_n.png \
    ressources/426413442_2595999480574305_7482630788142818249_n.png \
    ressources/bg 1.png

RESOURCES += \
    RESOURCES.qrc

