package com.mycompany.paginacion;

import java.util.ArrayList;
import java.util.List;
import java.util.*;

public class Paginacion {

    private List<String> data;
    private int TPagina; //Tamaño Paginación
    private int APagina; //Página Actual

    public Paginacion(List<String> data, int TPagina) {
        this.data = data; //Datos donde se guardan los procesos
        this.TPagina = TPagina; //Tamaño de Página
        this.APagina = 1; //Página Actual
    }

    public List<String> DPagina() { //Obtiene los Datos de la Página
        int startIndex = (APagina - 1) * TPagina;
        int endIndex = Math.min(startIndex + TPagina, data.size());
        return new ArrayList<>(data.subList(startIndex, endIndex));
    }
//Indicar Siguiente, Anterior y el Número de Paginas

    public void SiguientePagina() {
        if (APagina < TotalPaginas()) {
            APagina++;
        }
    }

    public void AnteriorPagina() {
        if (APagina > 1) {
            APagina--;
        }
    }

    public int TotalPaginas() {
        return (int) Math.ceil((double) data.size() / TPagina);
    }

    public int OAPagina() {
        return APagina;
    }

    public void EstablecePagina(int APagina) {
        if (APagina > 0 && APagina <= TotalPaginas()) {
            this.APagina = APagina;
        }
    }
// Fin de Indicar

    public void MPagina(int NPagina) { //Establece el Número de Páginas
        APagina = NPagina;
    }

    public void Agregar(String proceso) {
        data.add(proceso);
    }

    public void Eliminar(String proceso) {
        data.remove(proceso);
        data.add("null");
    }

    public static void main(String[] args) { // En el metodo main aqui guardamos los datos
        List<String> data = new ArrayList<>();
        Paginacion paginacion = new Paginacion(data,5);
        while (true) {
            // Imprimir los datos de la página actual
            System.out.println("=== Memoría " + paginacion.OAPagina() + " de " + paginacion.TotalPaginas() + " ===");
            for (String proceso : paginacion.DPagina()) {
                System.out.println(proceso);
            }

            // Pedir al usuario que avance o retroceda por las páginas
            System.out.println("\n[S]iguiente / [A]nterior / [E]stablecer Memorias /[D]elete /[I]nsertar Procesos / [SALIR] ");
            Scanner scanner = new Scanner(System.in);
            String opcion = scanner.nextLine().trim().toUpperCase();
            if (opcion.equals("S")) {
                paginacion.SiguientePagina();
            } else if (opcion.equals("A")) {
                paginacion.AnteriorPagina();
            } else if (opcion.equals("E")) {
                System.out.println("Ingrese el número de página: ");
                int pagina = scanner.nextInt();
                paginacion.EstablecePagina(pagina);
            } else if (opcion.equals("D")) {
                System.out.println("Ingrese el Proceso a eliminar: ");
                String proceso = scanner.nextLine();             
                paginacion.Eliminar(proceso);

            } else if (opcion.equals("I")) {
                String agregar = "s";
                //System.out.println("¿Desea agregar un proceso? (s/n)")
                do {
                    if (agregar.equals("s")) {
                        System.out.println("Ingrese un proceso");
                        String proceso = scanner.nextLine();
                        System.out.println("tu proceso es: " + proceso);
                        System.out.println("Ingrese el tamaño del proceso: ");
                        paginacion.Agregar(proceso);
                        int espacio = scanner.nextInt();
                        System.out.println("===================================");
                        for (int i = 1; i <= espacio; i++) {
                            System.out.println(proceso);
                            paginacion.Agregar(proceso);
                        }
                        agregar = scanner.nextLine();

                    } else if (agregar.equals("n"));
                    {
                        System.out.println("El proceso se ingreso exitosamente.");
                    }
                } while (agregar.equals("s"));
                if (agregar.equals("s")) {
                    System.out.println("Ingrese un proceso");
                    String proceso = scanner.nextLine();
                    System.out.println("tu proceso es: " + proceso);
                    paginacion.Agregar(proceso);
                    System.out.println("Ingrese el tamaño del proceso: ");
                    paginacion.Agregar(proceso);
                    int espacio = scanner.nextInt();
                    System.out.println("===================================");
                    for (int i = 1; i <= espacio; i++) {
                        System.out.println(proceso);
                        paginacion.Agregar(proceso);
                    }
                     agregar = scanner.nextLine();
                }
            } else if (opcion.equals("SALIR")) {
                break;
            } else {
                System.out.println("Opción inválida");
            }
        }

    }
}