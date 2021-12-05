lista = ['chicago', 'queens', 'salvador', 'pernambuco']

print(lista)

lista2 = [2, 3, 7, 8, 10]

print(lista2)

lista3 = [2.0, 3.5, 6.3]

print(lista3)

lista4 = [True, False]

print(lista4)

#index     0    1           2   3      4  5  6   -> 7 elementos
lista5 = [True, 'chicago', 2.5, False, 4, 8, 9]

print(lista5)

print(type(lista5))

print(lista5[1:]) # retorna do index que destacamos até o fim da lista
print(lista5[2:]) # retorna do index que destacamos até o fim da lista
print(lista5[:3]) # retorna do começo da lista até o index - 1
print(lista5[:4]) # retorna do começo da lista até o index - 1
print(lista5[1:4]) # retorna do index destacado até o index - 1
print(lista5[1:6:2])

nome5 = 'terra'

print(nome5[2:4])
