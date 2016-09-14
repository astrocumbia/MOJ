#!/usr/bin/python
import os
import sys
import threading
import time
import psutil
import subprocess

suitURL = '/Users/alejandro/Sites/moj'


def compilacion():
	c = subprocess.Popen('g++ '+suitURL+'/judge/user.cpp -w -o '+suitURL+'/judge/user.out', shell=True , stdout = subprocess.PIPE, stderr = subprocess.PIPE ) 
	(stdout, stderr) = c.communicate()
	if stderr:
		return False
	else:
		return True

def main():
	if( compilacion() ):
		p = subprocess.Popen( suitURL+'/judge/user.out > '+suitURL+'/judge/userans.out', shell=True , stdout = subprocess.PIPE, stderr = subprocess.PIPE ) 
		time.sleep( 2 )
		p.poll()
		if( p.returncode < 0 ):
			p.kill();
			print 4
		else:
			d = subprocess.Popen('diff '+suitURL+'/judge/userans.out '+suitURL+'/judge/ans.out > '+suitURL+'/judge/veredicto.txt', shell=True , stdout = subprocess.PIPE, stderr = subprocess.PIPE )
			(stdout, stderr) = d.communicate()
			if stderr:
				print 2
			else:
				if os.stat(suitURL+'/judge/veredicto.txt')[6] == 0:
					print 1 #aceptado
				else:
					print 2 #respuesta incorrecta
	else:
		print 3 #error de compilacion
			



if __name__ == "__main__":
    main()