package epreuve5;

public class epreuve5 {
	public static void main(String[] args) {
		int i = 0;
		for (int k= 0 ; k!=128 ; k++) { // erreur ligne 4
			i = k*k + 17;
		}
		System.out.println(" i : " + i); //erreur ligne 7
		String str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		StringBuffer buffer = new StringBuffer();
		for (int k = 0;k<str.length()/3;k++) { //erreur ligne 10
			buffer.append(str.substring(k+2,k+3));
		}
		System.out.println("Resultat : " + buffer.length());
		System.out.println("code épreuve : " + ( Math.pow(4, 2) * Math.pow(7, 2) * Math.pow(10, 2) * Math.pow(buffer.length(),2) )  );
	}
}