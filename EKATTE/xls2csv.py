import pandas as pd
data_xls = pd.read_excel('Ek_atte.xls', 'Ek_atte', index_col=None)
data_xls.to_csv('ekatte.csv', encoding='utf-8')
