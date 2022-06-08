using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net;
using System.Diagnostics;

namespace ConsoleApp3
{
    class Program
    {
        static void Main(string[] args)
        {
            WebClient Client = new WebClient();

            try
            {
                Client.DownloadFile("http://pippithecat.cf/setup/2008/Explorium.exe",@"C:/Explorium/2011/Explorium.exe");
                Console.WriteLine("Downloaded Explorium Client");
            }
            catch (Exception)
            {
                Console.WriteLine("Failed to Download Explorium Client");
                Environment.Exit(0);
            }
            Client.Dispose();


            Environment.Exit(0);

        }
    }
}
