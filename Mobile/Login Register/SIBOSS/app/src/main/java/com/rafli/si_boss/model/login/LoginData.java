package com.rafli.si_boss.model.login;

import com.google.gson.annotations.SerializedName;

public class LoginData {

	@SerializedName("email_user")
	private String emailUser;

	@SerializedName("nama_user")
	private String namaUser;

	@SerializedName("nik_user")
	private String nikUser;

	public void setEmailUser(String emailUser){
		this.emailUser = emailUser;
	}

	public String getEmailUser(){
		return emailUser;
	}

	public void setNamaUser(String namaUser){
		this.namaUser = namaUser;
	}

	public String getNamaUser(){
		return namaUser;
	}

}