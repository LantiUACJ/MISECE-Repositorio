from enum import unique
from unittest.util import _MAX_LENGTH
from django.db import models
from datetime import datetime

class Paciente(models.Model):
    #Información del paciente anonimizada
    paciente_id = models.CharField(max_length=128, primary_key=True)
    fecha_nac = models.DateField()
    estado_nac = models.CharField(max_length=50)
    nacionalidad = models.CharField(max_length=50, default="Desconocido")
    sexo = models.CharField(max_length=2)
    etnia = models.CharField(max_length=2)
    genero = models.CharField(max_length=30)
    tipo_sangre = models.CharField(max_length=2)
    sangre_rh = models.CharField(max_length=8)
    fecha_de_actualizacion = models.DateField(default=datetime.now)

class P_direccion(models.Model):
    #Dirección del paciente, solo la necesaria p/investigación
    paciente_id = models.CharField(max_length=128)
    tipo_dir = models.CharField(max_length=50)
    estado_dir = models.CharField(max_length=50)
    ciudad_dir = models.CharField(max_length=50)
    cp_dir = models.CharField(max_length=5)
    fecha_en_sistema = models.DateField(default=datetime.now)

class O_direccion(models.Model):
    paciente_id = models.CharField(max_length=128)
    organizacion_id = models.CharField(max_length=128)
    estado_dir = models.CharField(max_length=50)
    ciudad_dir = models.CharField(max_length=50)
    cp_dir = models.CharField(max_length=5)
    fecha_en_sistema = models.DateField(default=datetime.now)

class P_alergia(models.Model):
    paciente_id = models.CharField(max_length=128)
    alergia_id = models.CharField(max_length=128)
    citicidad = models.CharField(max_length=50)
    codigo_sistema = models.CharField(max_length=150)
    codigo_codigo = models.CharField(max_length=50)
    codigo_visual = models.CharField(max_length=50)
    texto = models.CharField(max_length=150)
    estatus = models.CharField(max_length=50)
    fecha_registro = models.DateTimeField
    fecha_en_sistema = models.DateField(default=datetime.now)

class P_encuentro(models.Model):
    paciente_id = models.CharField(max_length=128)
    encuentro_id = models.CharField(max_length=128, unique=True)
    estatus = models.CharField(max_length=50)
    sistema = models.CharField(max_length=150)
    codigo = models.CharField(max_length=50)
    visual = models.CharField(max_length=50)
    periodo_inicio = models.DateTimeField
    periodo_fin = models.DateTimeField
    fecha_en_sistema = models.DateField(default=datetime.now)

class P_observacion(models.Model):
    paciente_id = models.CharField(max_length=128)
    encuentro_id = models.CharField(max_length=128)
    observacion_id = models.CharField(max_length=128)
    codigo_sistema = models.CharField(max_length=150)
    codigo_codigo = models.CharField(max_length=50)
    codigo_visual = models.CharField(max_length=50)
    valor = models.CharField(max_length=150)
    cantidad_unidad = models.CharField(max_length=50)
    cantidad_valor = models.CharField(max_length=50)
    cantidad_codigo = models.CharField(max_length=50)
    cantidad_sitema = models.CharField(max_length=150)
    texto = models.CharField(max_length=150)
    fecha_efectiva = models.DateTimeField
    fecha_en_sistema = models.DateField(default=datetime.now)
