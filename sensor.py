import mysql.connector
from datetime import datetime
from time import sleep
import random

#tiempo a esperar entre cada insert (en segundos)
slp = 60

# Fecha actual
now = datetime.now().strftime("%Y-%m-%d %H:%M:%S") 
# Id de la raspberry
sensor = str(random.randrange(1,3))
# Valor float aleatorio entre 6 y 7 para el PH
ph = "%.2f" % random.uniform(6,9)
# Valor float aleatorio entre 6 y 7 para el PH
cloro = "%.2f" % random.uniform(0,3)


while True:
    try:
        db = mysql.connector.connect(
            host        = "localhost",
            user        = "root",
            password    = "",
            database    = "mipiscina",
        )

        cursor = db.cursor()

        sql = "INSERT INTO mediciones (FECHA_Y_HORA, ID_RASPBERRY, CLORO, PH) VALUES (%s, %s, %s, %s)"
        values = (now,sensor,cloro,ph)

        cursor.execute(sql, values)

        db.commit()

        print("Se han insertado " + str(cursor.rowcount) + " Fila a la base de datos con los valores:")
        print("Fecha: " + now)
        print("Sensor: " + sensor)
        print("PH:" + ph)
        print("cloro: " + cloro)

    except mysql.connector.Error as error:
        db.rollback()
        print("Failed to insert into MySQL table {}".format(error))

    finally:
        if (db.is_connected()):
            cursor.close()
            db.close()
            print("Conexión a la base de datos cerrada\n")
    sleep(slp)
