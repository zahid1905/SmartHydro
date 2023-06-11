close all
% Simulando una señal de voltaje
ruido=rand(1000,1);
radio=1;
radio2=2.5;
x= 6+radio*randn(400,1);
y= 3+radio*randn(400,1);
x=[x;15+radio2*randn(1200,1)];
y=[y;8.5+radio2*randn(1200,1)];

plot(x,y,'.');
title('Caso de dos dimensiones');
xlabel('Var 1');
ylabel('Var 2');
hold off

%
%
% Versión para 1 sola clase de datos
%
%% Vamos a hacer la clasificacion
p=fix(length(x)*rand),

c1=x(p),  %  Seleccionar algo al azar.
r1=1;     % Radio predefinido de acuerdo al conocimiento del problema
c2=y(p),  %  Seleccionar algo al azar.
r2=1;     % Radio predefinido de acuerdo al conocimiento del problema
r=max([r1 r2]);
convergencia=[c1 r1 c2 r2]; % Datos para la convergencia
k=0.65;
for veces=1:100
  hold off
   plot(x,y,'.b');
   title('Caso de dos dimensiones');
   xlabel('Var 1');
   ylabel('Var 2');
   hold on
   plot(c1,c2,'xr','markersize',10,'linewidth',3);
  hold on

   pertenece=zeros(size(x));
  % Identificar a los elementos que pertenecen al circulo
  for i=1:length(pertenece)
     if(distancia([c1,c2],[x(i),y(i)])<=r)
        pertenece(i)=1; % Si estas dentro del radio
        plot(x(i),y(i),'.m');
     end
  end
  % Calcular el nuevo promedio
  c1=promedio(x(logical(pertenece)));
  c2=promedio(y(logical(pertenece)));
  %
  %Calcular la desviacion estandar
  r1=k*desvEst(x(logical(pertenece)),c1);
  r2=k*desvEst(x(logical(pertenece)),c2);
  r=max([r1,r2]);
  %%%%
  fprintf('Iteraciones %d : Clase (%4.4f,%4.4f) con un radio (%4.4f,%4.4f) \n',veces, c1,r1,c2,r2);
  convergencia=[convergencia; c1 r1 c2 r2];
  % Condicion para salirse por error
  if(distancia([convergencia(end,1),convergencia(end,3)],
     [convergencia(end-1,1),convergencia(end-1,3)])<0.0000001)
  % El promedio se actualiza menos que el errror 0.0001
     break;
  end
  pause(0.5);
end

figure;
plot(convergencia(:,1));
title('Evolución del Promedio');
xlabel('No Veces');
