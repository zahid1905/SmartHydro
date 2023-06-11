close all
% Simulando una señal de voltaje
ruido=rand(1000,1);

x=120+2*randn(500,1);

x=[x;2+1*randn(100,1);x];

plot(x)
xlabel('Tiempo');
ylabel('Voltaje');
figure;
hist(x,30);
xlim([110 130]);
xlabel('Voltaje');
ylabel('Frecuencia/Ocurrencia');
%
%
% Versión para 1 sola clase de datos
%
%% Vamos a hacer la clasificacion
p=fix(length(x)*rand),
c=x(p),  %  Seleccionar algo al azar.
r=1;     % Radio predefinido de acuerdo al conocimiento del problema
convergencia=[c r]; % Datos para la convergencia

for veces=1:1000000
  hold on
  plot([c c],[0 1000],'r');
  pertenece=zeros(size(x));
  % Identificar a los elementos que pertenecen al circulo
  for i=1:length(pertenece)
     if(abs(x(i)-c)<=r)
        pertenece(i)=1; % Si estas dentro del radio
     end
  end
  % Calcular el nuevo promedio
  c=promedio(x(logical(pertenece)));
  %
  %Calcular la desviacion estandar
  r=2*desvEst(x(logical(pertenece)),c);
  %%%%
  fprintf('Iteraciones %d : Clase %4.4f con un radio %4.4f \n',veces, c,r);
  convergencia=[convergencia; c r];
  % Condicion para salirse por error
  if(abs(convergencia(end,1)-convergencia(end-1,1))<0.0001)
  % El promedio se actualiza menos que el errror 0.0001
     break;
  end
end

figure;
plot(convergencia(:,1));
title('Evolución del Promedio');
xlabel('No Veces');
