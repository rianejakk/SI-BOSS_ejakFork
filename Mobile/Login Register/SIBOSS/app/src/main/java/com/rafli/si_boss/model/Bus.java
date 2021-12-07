package com.rafli.si_boss.model;

public class Bus {
    private int id_bus;
    private String nama_bus;
    private String detail_bus;
    private String status_bus;
    private int jumlah_kursi;
    private String foto_bus;

    public Bus(int id_bus, String nama_bus, String detail_bus, String status_bus, int jumlah_kursi, String foto_bus) {
        this.id_bus = id_bus;
        this.nama_bus = nama_bus;
        this.detail_bus = detail_bus;
        this.status_bus = status_bus;
        this.jumlah_kursi = jumlah_kursi;
        this.foto_bus = foto_bus;
    }

    public int getId_bus() {
        return id_bus;
    }

    public void setId_bus(int id_bus) {
        this.id_bus = id_bus;
    }

    public String getNama_bus() {
        return nama_bus;
    }

    public void setNama_bus(String nama_bus) {
        this.nama_bus = nama_bus;
    }

    public String getDetail_bus() {
        return detail_bus;
    }

    public void setDetail_bus(String detail_bus) {
        this.detail_bus = detail_bus;
    }

    public String getStatus_bus() {
        return status_bus;
    }

    public void setStatus_bus(String status_bus) {
        this.status_bus = status_bus;
    }

    public int getJumlah_kursi() {
        return jumlah_kursi;
    }

    public void setJumlah_kursi(int jumlah_kursi) {
        this.jumlah_kursi = jumlah_kursi;
    }

    public String getFoto_bus() {
        return foto_bus;
    }

    public void setFoto_bus(String foto_bus) {
        this.foto_bus = foto_bus;
    }
}
