# -*- coding: utf-8 -*-
import sys
import io
import mysql.connector

con = mysql.connector.connect(host='localhost',database='observatorio_db', user='root2',password='')
if con.is_connected():
    db_info = con.get_server_info()
    print("Conectado ao servidor MySQL versão ", db_info)
    cursor = con.cursor()
    cursor.execute("select database();")
    linha = cursor.fetchone()
    print("Conectado ao banco de dados ", linha)

leitor = io.open("Informacoes_Observatorio.txt", "r", encoding="utf8")

listadelinhas = leitor.readlines()
print(len(listadelinhas))

i=0
while (i<len(listadelinhas)):
    titulo = listadelinhas[i].lstrip()
    i+=1
    autor = listadelinhas[i].lstrip()
    i+=1
    data_pub = listadelinhas[i].lstrip()
    i+=1
    tipo = listadelinhas[i].lstrip()
    i+=1
    palavras_chave = listadelinhas[i].lstrip()
    i+=1
    resumo = listadelinhas[i].lstrip()
    i+=1
    link = listadelinhas[i].lstrip()
    i+=1
    arquivo = listadelinhas[i].lstrip()
    i+=1
    sql = "INSERT INTO trabalhos_publicados (Titulo, Autor, Data, Palavras_Chave, Tipo, Resumo, Arquivo, Link) VALUES (%s, %s,%s,%s,%s,%s,%s,%s)"
    val = (titulo, autor, data_pub, palavras_chave, tipo, resumo, arquivo, link)
    cursor.execute(sql,val)
    con.commit()
    print("Inserted", cursor.rowcount,"row(s) of data.")

if con.is_connected():
    cursor.close()
    con.close()
    print("Conexão ao MySQL foi encerrada")