#include <stdio.h>
#include <string.h>

int main(){
	int filas;
	int columnas;
	int n;
	int i=0;
	int j=0;
	int index1;
	int index2;
	float sup;
	float inf;
	float sum;
	float probabilidad;
	int c=0;
	int flag=1;
	
	printf("Cuantas categorias hay en el primer envento? :  ");
	scanf("%i",&filas);
	printf("Cuantas subcategorias derivan? (Almenos 2):  ");
	scanf("%i",&columnas);
	if(columnas>1){
		int colProb=columnas+1;
		char cat[filas];
		int subcat[columnas];
		float prob[filas][colProb];
		
		
		char letra;
		printf("******* Categorias *******\n");
		for(i=0;i<filas;i++){
			printf("Ingrese un caracter para la categoria:  ");
			scanf("%s",&cat[i]);
		}
		printf("******* Subcategorias *******\n");
		for(i=0;i<columnas;i++){
			printf("Ingrese un numero entero para la subcategoria:  ");
			scanf("%i",&subcat[i]);
		}
		
		
		
		printf("******* Probabilidades de categoria*******\n");
		for(i=0;i<filas;i++){
			printf("Ingrese la probabilidad para la categoria %c:  ",cat[i]);
			scanf("%f",&prob[i][0]);
			sum+=prob[i][0];
		}
		if(sum==1){
			sum=0;
			printf("******* Probabilidades de subcategoria*******\n");
			for(i=0;i<filas;i++){
				for(j=1;j<colProb;j++){
					printf("Ingrese la probabilidad para la opcion %i de la categoria %c:  ",subcat[c],cat[i]);
					scanf("%f",&prob[i][j]);
					sum+=prob[i][j];
					c++;
				}
				if(sum==1){
					sum=0;
				}else{
					flag=0;
					i=filas;
				}
				c=0;
			}
			
			if(flag==1){
				printf("\n*******Matriz de probabilidades*******\n\n");
				for(i=0;i<filas;i++){
					for(j=0;j<colProb;j++){
						printf("%f  ",prob[i][j]);
					}
					printf("\n");
				}
			
				printf("\n");
			
				printf( "******** Elige una categoria ******* \n");
			
				for(i=0;i<filas;i++){
					printf( "%i.- %c \n",i+1 ,cat[i]);
				}
			
				scanf("%i",&index1);
				index1=index1-1;
				
				printf( "******** Elige una subcategoria ******* \n");
				for(i=0;i<columnas;i++){
					printf( "%i.- %i \n", i+1,subcat[i]);
				}
				scanf("%i",&index2);
				
				sup=prob[index1][0]*prob[index1][index2];
				for(i=0; i<filas;i++){
					inf=inf+(prob[i][0]*prob[i][index2]);
				}
			
				probabilidad=sup/inf;
				
				printf("La probabilidad es de : %f",probabilidad);
			}else{
				printf("La probabilidad de la subcategoria no suma 1");	
			}
		}else{
		printf("La probabilidad de las categorias no suma 1");		
		}
	}else{
		printf("introduzca almenos 2 subcategorias");
	}
	
	
	
	return 0;
}


