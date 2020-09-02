import pandas as pd 
import sqlalchemy

xls=pd.ExcelFile('UsuariosLuis.xlsx')
print(xls.sheet_names)
df=xls.parse('Hoja1')
print(df)

engine = create_engine('mysql://root:@localhost/copepython')
df.to_sql('asociados', con=engine)

from sqlalchemy.types import String, SmallInteger

df.to_sql('asociados', con=engine, if_exists='append', index=False, dtype={'COD_SOCIO': String(length=255),
'NOMBRE': String(length=255), 'APELLIDO1': String(length=255), 'APELLIDO2': String(length=255), 'NO_TC': String(length=255), 'FCH_CON': Date, 'MONTO': String(length=255), 'SALDO': String(length=255)})