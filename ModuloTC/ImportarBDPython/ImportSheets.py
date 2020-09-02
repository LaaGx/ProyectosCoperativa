# import csv
# import mysql.connector
# import datetime
# mydb=mysql.connector.connect(host='localhost',user='root',password='',database='copepython', port=3307)
# print("database connected")

# cursor =mydb.cursor()
# csv_data =csv.reader(open('DataPruebaUpload.csv'))
# for row in csv_data:
#     cursor.execute('INSERT INTO asociados (COD_SOCIO,NOMBRE,APELLIDO1,APELLIDO2,NO_TC,FCH_CON,MONTO,SALDO) VALUES(%s,%s,%s,%s,%s,%s,%s,%s)', row)
#     print(row)
    
# mydb.commit()
# cursor.close()
# print("HECHO")


#---------------------------------------------------------------------------------------



